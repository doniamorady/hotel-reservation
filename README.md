# 🏨 سیستم رزرو هتل

یک سیستم کامل رزرو آنلاین هتل که با استفاده از **Laravel** در بخش Backend و **React** در بخش Frontend توسعه داده شده است.

هدف این پروژه ایجاد یک پلتفرم رزرو هتل با قابلیت مشاهده اتاق‌ها، بررسی ظرفیت و موجودی، احراز هویت کاربران، ایجاد رزرو و مدیریت فرآیند رزرو می‌باشد.

---

# ✨ امکانات پروژه

## 👤 امکانات کاربران

- 🔐 ورود و احراز هویت با شماره موبایل و OTP
- 👤 مشاهده و مدیریت اطلاعات کاربر
- 🏨 مشاهده لیست اتاق‌های هتل
- 🔎 جستجو، فیلتر و مرتب‌سازی اتاق‌ها
- 🖼️ مشاهده تصاویر و گالری اتاق‌ها
- 📄 مشاهده جزئیات کامل هر اتاق
- 📅 انتخاب تاریخ ورود و خروج
- 👥 تعیین تعداد مهمان‌ها
- 🍳 انتخاب صبحانه به صورت اختیاری
- 💰 محاسبه خودکار هزینه رزرو
- ✅ بررسی موجود بودن اتاق در بازه زمانی انتخاب شده
- 📋 مشاهده خلاصه رزرو قبل از پرداخت
- 📌 مشاهده و مدیریت رزروهای کاربر

---

# 🛠 تکنولوژی‌های استفاده شده

## Backend

- Laravel 12
- PHP 8.2+
- Laravel Sanctum
- MySQL
- RESTful API
- Eloquent ORM

## Frontend

- React 19
- Vite
- React Router
- TanStack React Query
- Axios
- Bootstrap 5
- Tailwind CSS
- React Date Picker

---

# 📁 ساختار پروژه

```
hotel-reservation

├── backend
│   ├── app
│   ├── routes
│   ├── database
│   ├── storage
│   └── ...

└── frontend
    ├── src
    │   ├── components
    │   ├── pages
    │   ├── hooks
    │   ├── services
    │   ├── layouts
    │   └── utils
    │
    └── ...
```

---# 🚀 نصب و راه‌اندازی

## Backend

```bash
cd backend

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan storage:link

php artisan serve
```

اطلاعات دیتابیس را در فایل `.env` تنظیم کنید.

---

## Frontend

```bash
cd frontend

npm install

npm run dev
```

بعد از اجرای هر دو بخش، پروژه از طریق آدرس Frontend قابل استفاده خواهد بود.
---

# 🔑 اطلاعات ورود تستی

بعد از اجرای Seeder، یک کاربر مدیر به صورت خودکار ساخته می‌شود.

## 👨‍💻 حساب کاربری Admin

```
شماره موبایل:
09123456789

رمز عبور:
123456789
```

این کاربر دارای نقش `admin` می‌باشد.

---

# 🔐 سیستم احراز هویت

احراز هویت کاربران با استفاده از **Laravel Sanctum** پیاده‌سازی شده است.

روند ورود:

1. کاربر شماره موبایل خود را وارد می‌کند.
2. یک کد تایید OTP برای کاربر تولید می‌شود.
3. کاربر کد تایید را وارد می‌کند.
4. در صورت تایید، یک Token ایجاد می‌شود.
5. درخواست‌های محافظت شده با استفاده از Token ارسال می‌شوند.

نمونه Header درخواست‌های احراز شده:

```http
Authorization: Bearer {token}
```

## 📱 کد تایید OTP

در محیط توسعه (Development)، سیستم ارسال پیامک فعال نشده است.

برای تست ورود، کد OTP تولید شده در Console Log مربوط به Backend نمایش داده می‌شود.

بعد از درخواست ارسال کد تایید، می‌توانید کد نمایش داده شده در ترمینال Laravel را برداشته و در فرم ورود وارد کنید.

---

# 📡 API های اصلی

## Authentication

| Method | Endpoint | توضیحات |
|---|---|---|
| POST | `/api/auth/send-otp` | ارسال کد تایید |
| POST | `/api/auth/verify-otp` | تایید کد ورود |
| GET | `/api/me` | دریافت اطلاعات کاربر |
| POST | `/api/logout` | خروج کاربر |

---

## Rooms

| Method | Endpoint | توضیحات |
|---|---|---|
| GET | `/api/rooms` | دریافت لیست اتاق‌ها |
| GET | `/api/rooms/{id}` | مشاهده جزئیات اتاق |

---

## Bookings

| Method | Endpoint | توضیحات |
|---|---|---|
| POST | `/api/bookings` | ایجاد رزرو جدید |
| GET | `/api/bookings` | مشاهده رزروهای کاربر |

---

# 🧮 محاسبه هزینه رزرو

سیستم به صورت خودکار موارد زیر را محاسبه می‌کند:

- تعداد شب‌های اقامت
- هزینه اتاق
- هزینه صبحانه
- مالیات
- مبلغ نهایی رزرو

---


**Donya Moradi**

Backend-focused Web Developer

مهارت‌ها:

- PHP / Laravel
- JS/ React
- REST API
- MySQL
- Git

