import tensorflow as tf
from tensorflow.keras.applications import VGG16
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense, Flatten
from tensorflow.keras.preprocessing.image import ImageDataGenerator
from sklearn.model_selection import StratifiedKFold
import numpy as np
import os

# Path dataset
dataset_dir = "dataset"
labels = ["kacang_tanah", "kacang_merah", "kacang_kedelai", "kacang_hijau"]

# Preprocessing dan augmentasi
datagen = ImageDataGenerator(
    rescale=1.0/255,
    rotation_range=20,
    width_shift_range=0.2,
    height_shift_range=0.2,
    zoom_range=0.2,
    horizontal_flip=True
)

data = []
targets = []
for label in labels:
    folder = os.path.join(dataset_dir, label)
    for file in os.listdir(folder):
        img_path = os.path.join(folder, file)
        img = tf.keras.preprocessing.image.load_img(img_path, target_size=(224, 224))
        img_array = tf.keras.preprocessing.image.img_to_array(img)
        data.append(img_array)
        targets.append(labels.index(label))

data = np.array(data)
targets = np.array(targets)

# Stratified K-Fold
kf = StratifiedKFold(n_splits=5, shuffle=True, random_state=42)

for train_index, val_index in kf.split(data, targets):
    train_data, val_data = data[train_index], data[val_index]
    train_targets, val_targets = targets[train_index], targets[val_index]

    # Model VGG16
    base_model = VGG16(weights='imagenet', include_top=False, input_shape=(224, 224, 3))
    model = Sequential([
        base_model,
        Flatten(),
        Dense(256, activation='relu'),
        Dense(len(labels), activation='softmax')
    ])

    model.compile(optimizer='adam', loss='sparse_categorical_crossentropy', metrics=['accuracy'])

    model.fit(
        train_data, train_targets,
        validation_data=(val_data, val_targets),
        epochs=10,
        batch_size=32
    )

    model.save("models/kacang_model.h5")
