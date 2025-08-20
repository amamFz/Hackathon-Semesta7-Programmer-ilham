# Smart Complaint Management

Aplikasi manajemen keluhan penghuni apartemen berbasis Laravel, dengan fitur auto-assign staff, notifikasi Telegram, dashboard analitik, dan AI analysis.

## Teknologi yang Digunakan

- Laravel 12 (Fullstack)
- PostgreSQL (Database)
- Tailwind CSS (Frontend)
- Chart.js (Dashboard Grafik)
- Telegram Bot API (Notifikasi)
- Font Awesome (Ikon)

## Cara Instalasi & Menjalankan Aplikasi

1. **Clone repository**

   ```
   git clone https://github.com/amamFz/Hackathon-Semesta7-Programmer-ilham.git
   cd Hackathon-Semesta7-Programmer-ilham
   ```

2. **Jalankan database container:**

   ```
   docker compose -up -d
   ```

3. **Install dependency**

   ```
   composer install
   npm install
   ```

4. **Copy file environment**

   ```
   cp .env.example .env
   ```

5. **Set konfigurasi database di file `.env`**

6. **Generate key**

   ```
   php artisan key:generate
   ```

7. **Migrasi & seed database**

   ```
   php artisan migrate --seed
   ```

8. **Jalankan aplikasi**
   ```
   php artisan serve
   npm run dev
   ```

## Sample Data / Kredensial Login

| Role       | Email                  | Password      |
| ---------- | ---------------------- | ------------- |
| Admin      | admin@gmail.com        | admin123      |
| Supervisor | supervisor@gmail.com   | supervisor123 |
| Staff      | stafflistrik@gmail.com | listrik123    |
| Resident   | user@gmail.com         | resident123   |

> **Catatan:** Data di atas bisa berbeda sesuai hasil seeder.

## Dokumentasi Fitur

- **Auto-Assignment:** Keluhan otomatis di-assign ke staff spesialis.
<!-- - **Re-Assignment:** Keluhan yang tidak direspons 2 jam otomatis ke supervisor. -->
- **Notifikasi Telegram:** Petugas & supervisor dapat notifikasi real-time.
- **Dashboard Analitik:** Grafik keluhan bulanan, per kategori, top 10 pelapor.
  <!-- - **PDF Report:** Laporan mingguan dalam format PDF. -->
  <!-- - **AI Analysis:** Analisis pola keluhan & rekomendasi solusi. -->

```

---

**Catatan:**

- Untuk notifikasi Telegram, isi `TELEGRAM_BOT_TOKEN` di `.env` dan pastikan kolom `telegram_chat_id` pada tabel `users` sudah terisi.

---

\*\*Aplikasi ini dikembangkan untuk kebutuhan hackathon dan dapat dikembangkan lebih lanjut
```
