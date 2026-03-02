# Project Perpustakaan Digital - Laravel

Proyek sistem informasi perpustakaan berbasis web yang dikembangkan menggunakan Laravel dengan fokus pada antarmuka pengguna (UI/UX) modern bertema **Visual Studio Code Dark**.

## 🎨 Tema & Desain
Project ini menggunakan tema kustom **VS Code Dark Edition**:
- **Editor Background**: `#1e1e1e`
- **Sidebar & Layout**: `#252526`
- **Accent Color**: `#007acc` (VS Code Blue)
- **Typography**: Inter / Segoe UI (Clean & Readable)

## 🚀 Fitur Utama
1.  **Sistem Autentikasi**: Login dan Register dengan desain minimalis khas editor VS Code.
2.  **Manajemen Mahasiswa**: Tabel data mahasiswa dengan fitur visual dark mode, zebra striping, dan status badge.
3.  **Responsive Layout**: Sidebar navigasi yang fleksibel untuk berbagai ukuran layar.

## 👥 Pembagian Tugas Tim (4 Orang)
| Peran | Deskripsi |
| :--- | :--- |
| **Person 1** | **UI/UX & Layout Lead** (CSS Theme, Base Layout `app.blade.php`) |
| **Person 2** | **Frontend (Auth)** (Implementasi `login.blade.php`, `register.blade.php`) |
| **Person 3** | **Backend Developer** (Model, Migration, Controller Mahasiswa, Routing) |
| **Person 4** | **Frontend (Table & Integration)** (UI Tabel Mahasiswa & Data Integration) |

## 🛠️ Cara Instalasi
1.  **Clone Repository**:
    ```bash
    git clone https://github.com/MsZakra/Project-laravel.git
    ```
2.  **Install Dependencies**:
    ```bash
    composer install
    npm install
    ```
3.  **Setup .env**:
    Copy `.env.example` ke `.env` dan atur konfigurasi database.
4.  **Generate Key**:
    ```bash
    php artisan key:generate
    ```
5.  **Run Application**:
    ```bash
    php artisan serve
    ```

## 📁 Struktur View Penting
- `resources/views/layouts/app.blade.php`: Layout utama dengan Sidebar.
- `resources/views/layouts/auth.blade.php`: Layout khusus halaman login/register.
- `resources/views/auth/`: Halaman login dan register.
- `resources/views/mahasiswa/index.blade.php`: Tabel data mahasiswa.
- `public/css/style.css`: File CSS utama tema VS Code Dark.

---
Dikembangkan untuk tugas project pemrograman web.
