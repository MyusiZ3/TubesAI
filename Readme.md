TubesAI
    kacang_recognizer/
    ├── dataset/               # Folder dataset gambar kacang
    │   ├── kacang_tanah/
    │   ├── kacang_merah/
    │   ├── kacang_kedelai/
    │   └── kacang_hijau/
    ├── models/                # Folder untuk menyimpan model yang sudah dilatih
    │   └── kacang_model.h5
    ├── scripts/               # Folder untuk semua script Python
    │   ├── training.py        # Script untuk melatih model
    │   ├── predict.py         # Script untuk melakukan prediksi
    │   ├── augment.py         # Script untuk augmentasi dataset (masiopsional)
    ├── web/                   # Folder untuk web interface
    │   ├── index.php          # Halaman utama web
    │   ├── upload.php         # Script untuk upload gambar
    │   ├── kamera.php         # Script untuk akses kamera
    │   ├── assets/            # Folder untuk gambar dan file statis
    ├── requirements.txt       # File untuk daftar library Python
    └── README.md              # Dokumentasi proyek
