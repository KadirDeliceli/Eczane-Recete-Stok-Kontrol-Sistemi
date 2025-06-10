🏥 💊 Şifa Eczanesi Reçete ve Stok Takip Sistemi  
**Prescription & Stock Tracking System for Şifa Pharmacy**

📌 Proje Açıklaması | Project Description

Bu proje, **Şifa Eczanesi** için geliştirilmiş bir reçete ve ilaç stok yönetim sistemidir.  
Amaç, doktorların reçetelerini dijital ortamda yazabilmesi, eczane çalışanlarının stok takibini kolaylaştırması ve geçmiş verilere erişimi sağlamaktır.

This project is a **Prescription and Drug Stock Management System** developed for **Şifa Pharmacy**.  
Its aim is to allow doctors to write prescriptions digitally, assist pharmacy staff in tracking inventory, and provide access to historical data.

---

## 🔧 Kullanılan Teknolojiler | Technologies Used

- ✅ **PHP** (Procedural)  
- ✅ **HTML & CSS**  
- ✅ **MySQL Server**  
- ✅ **Visual Studio Code**

---

## 📁 Uygulamanın Kapsamı | Application Scope

- 👨‍⚕️ Doktor Kaydı | Doctor Management  
- 🧑‍⚕️ Hasta Kaydı | Patient Management  
- 🧾 Reçete Oluşturma | Prescription Management  
- 💊 İlaç Stok Takibi | Drug Inventory Management  
- 📄 Reçete-İlaç Detayları | Prescription Drug Details (dose etc.)

---

## 🚫 Sistem Kuralları | System Constraints

- ❌ **Kayıtsız hastalara reçete yazılamaz.**  
  Unregistered patients cannot be prescribed.

- ❌ **Stokta olmayan ilaç reçeteye eklenemez.**  
  Drugs not in stock cannot be added to a prescription.

- ➕ **Her reçeteye birden fazla ilaç eklenebilir.**  
  Multiple drugs can be added to a prescription.

- 📥 **Doz bilgisi girilmeden ilaç eklenemez.**  
  Dosage information must be provided for each drug.

- 📉 **Reçete yazıldığında stoktan otomatik düşülür.**  
  When a prescription is written, drug stock is automatically updated.

---

## 🏥 Senaryo | Scenario

📌 Bu sistem sayesinde:  
- Eczane çalışanları stokları daha iyi yönetir.  
- Doktorlar reçeteleri dijital ortamda hızlıca oluşturur.  
- Eski reçetelere erişim sağlanır.  
- Manuel takip hataları önlenir.  
- Reçete ve stok sistemi entegre çalışır.

📌 With this system:  
- Pharmacy staff can better manage inventory.  
- Doctors can create prescriptions digitally.  
- Old prescriptions can be accessed.  
- Manual tracking errors are prevented.  
- Prescription and inventory systems work together automatically.

---

## 🗃️ Veritabanı Dosyaları | Database Files

- **`sifa_eczanesi_.sql`** → Temel veritabanı şeması | Main database schema  
- **`yordamlar_ve_tetikleyiciler.sql`** → Yordamlar ve tetikleyiciler | Stored procedures & triggers

---

## ⚙️ Kurulum | Installation

1. Bu depoyu klonlayın | Clone this repo:
  
    sifa_eczanesi_.sql ve yordamlar_ve_tetikleyiciler.sql dosyalarını MySQL'e yükleyin.
    Import SQL files into your MySQL server.

    config.php içindeki veritabanı bağlantı bilgilerini düzenleyin.
    Configure DB connection settings in config.php.

    $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi ", 3357);
    📌 Port numarası sizde farklıysa (örneğin 3306), kendi sisteminize göre değiştirin.

    Projeyi XAMPP/WAMP gibi bir local sunucuda çalıştırın.
    Run the project on a local server like XAMPP or WAMP.
