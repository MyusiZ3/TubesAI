TubesAI # Folder Utama yg ada di dalam htdoct
    ├── datatest/               # Folder dataset test gambar kacang
    │   ├── kacang_tanah/
    │   ├── kacang_merah/
    │   ├── kacang_kedelai/
    │   └── kacang_hijau/
    ├── dataset/               # Folder dataset training gambar kacang
    │   ├── kacang_tanah/
    │   ├── kacang_merah/
    │   ├── kacang_kedelai/
    │   └── kacang_hijau/
    ├── models/                # Folder untuk menyimpan model yang sudah dilatih
    │   └── kacang_model.h5
    ├── scripts/               # Folder untuk semua script Python
    │   ├── training.ipynb        # Script untuk melatih model
    │   ├── predict.ipynb         # Script untuk melakukan prediksi
    │   ├── augment.ipynb        # Script untuk augmentasi dataset (masiopsional)
    ├── web/                   # Folder untuk web interface
    │   ├── index.php          # Halaman utama web
    │   ├── upload.php         # Script untuk upload gambar
    │   ├── kamera.php         # Script untuk akses kamera
    │   ├── assets/            # Folder untuk gambar dan file statis
    ├── requirements.txt       # File untuk daftar library Python
    └── README.md              # Dokumentasi proyek