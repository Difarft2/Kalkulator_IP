# 🧮 Kalkulator IP - Laravel IP Calculator

**Kalkulator IP** adalah aplikasi berbasis Laravel untuk menghitung informasi subnetting IPv4 seperti network, netmask, broadcast, dan IP range.  
Aplikasi ini memiliki tampilan web (Blade) serta menyediakan **API publik berbasis JSON** yang dapat diintegrasikan ke sistem lain (seperti frontend React, mobile app, dsb).

---

## ✨ Fitur Utama

- 🔢 Hitung IP, Subnet, Netmask, Broadcast, Host Range
- 📄 Tampilan web berbasis Laravel Blade
- 🌐 RESTful API JSON untuk integrasi pihak ketiga
- 📱 Cocok untuk aplikasi pembelajaran jaringan dan tool sysadmin
- 🛠️ Terbuka untuk dikembangkan lebih lanjut (open source)

---

## 📁 Struktur Folder Penting

```
app/
├── Http/
│   └── Controllers/
│       └── IPCalculatorController.php

routes/
├── web.php        # Untuk tampilan web
├── api.php        # Untuk endpoint API

```

---

## 💻 Cara Penggunaan (Tampilan Web)

Kunjungi halaman utama, masukkan alamat IP dan CIDR (contoh: `192.168.1.1` dan `24`), lalu klik tombol.
Hasil akan ditampilkan langsung di halaman web.

---

## 📡 Dokumentasi API (JSON)

### ✅ Parameter Wajib:

| Parameter | Tipe   | Deskripsi             |
|-----------|--------|------------------------|
| `ip`      | string | Alamat IP (IPv4)      |
| `cidr`    | int    | CIDR subnet (1–32)    |

### 🔄 Contoh Request:

```
POST http://localhost:8000/calculate-ip?ip=192.168.1.1&cidr=24
```

### 📥 Contoh Respons JSON:

```json
{
  "ip": "192.168.1.1",
  "cidr": 24,
  "netmask": "255.255.255.0",
  "wildcard": "0.0.0.255",
  "network": "192.168.1.0/24",
  "broadcast": "192.168.1.255",
  "hostMin": "192.168.1.1",
  "hostMax": "192.168.1.254",
  "hosts": 254
}
```

### ❌ Error Handling:

Jika input tidak valid:

```json
{
  "error": "IP address atau CIDR tidak valid."
}
```

---

## 🧾 Proyek dalam Portofolio

**🗂️ Proyek: Kalkulator IP Laravel + API**  
- 📍 **Kategori:** Jaringan Komputer / Alat Bantu Developer  
- 📅 **Tahun:** 2025  
- 🧠 **Fungsi:** Hitung IP/Subnet, menyediakan API jaringan  
- 🖥️ **Teknologi:** Laravel, Blade, JSON API  
- 📝 **Deskripsi:**  
  Aplikasi open source kalkulator jaringan IP berbasis Laravel dengan antarmuka web dan API publik, cocok untuk integrasi ke aplikasi lain atau penggunaan mandiri.

> _Proyek ini merupakan bagian dari portofolio publik developer dan dapat digunakan bebas dengan atribusi._

---

## 🛡️ Lisensi

**MIT License**

Hak cipta © 2025 Difarft

Izin diberikan secara gratis kepada siapa pun yang mendapatkan salinan perangkat lunak ini dan file dokumentasi terkait ("Perangkat Lunak"), untuk menangani Perangkat Lunak tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah, menggabungkan, menerbitkan, mendistribusikan, mensublisensikan, dan/atau menjual salinan Perangkat Lunak, serta mengizinkan orang yang menerima Perangkat Lunak melakukannya, dengan syarat mencantumkan atribusi kepada pengembang asli.

PERANGKAT LUNAK INI DIBERIKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN TERSIRAT, TERMASUK NAMUN TIDAK TERBATAS PADA JAMINAN DIPERJUALBELIKAN, KESESUAIAN UNTUK TUJUAN TERTENTU DAN BEBAS DARI PELANGGARAN.  
DALAM HAL APA PUN PENULIS ATAU PEMEGANG HAK CIPTA TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN, ATAU KEWAJIBAN LAIN, BAIK DALAM TINDAKAN KONTRAK, KESALAHAN, ATAU LAINNYA, YANG TIMBUL DARI, KELUAR DARI, ATAU SEHUBUNGAN DENGAN PERANGKAT LUNAK ATAU PENGGUNAAN ATAU TRANSAKSI LAIN DALAM PERANGKAT LUNAK.

---

## 📬 Kontak

Jika ada pertanyaan, masukan, atau ingin bekerja sama:

- 📧 Email: mailoffice@difarft.com
- 📲 Telegram: https://t.me/Difarft

