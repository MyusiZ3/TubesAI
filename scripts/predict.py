from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image
import numpy as np

# Load model
model = load_model("models/kacang_model.h5")
labels = ["kacang_tanah", "kacang_merah", "kacang_kedelai", "kacang_hijau"]

def predict_image(image_path):
    img = image.load_img(image_path, target_size=(224, 224))
    img_array = image.img_to_array(img) / 255.0
    img_array = np.expand_dims(img_array, axis=0)

    prediction = model.predict(img_array)
    label = labels[np.argmax(prediction)]
    return label
