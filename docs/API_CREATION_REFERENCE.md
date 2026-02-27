# API Creation Reference

هذا الملف مرجع سريع لكل العمليات التي تم تنفيذها في المشروع من البداية، بحيث تستخدمه عند إنشاء أي API مشابه مستقبلاً.

## 1) بناء CRUD للـ Web Controller

تم تنفيذ CRUD لمنتج (`Prodect`) عبر `ProdectWebController`:

- `index`: عرض كل الريكوردات.
- `create`: عرض فورم الإضافة.
- `store`: حفظ ريكورد جديد.
- `edit`: عرض فورم تعديل ريكورد.
- `update`: تحديث ريكورد.
- `destroy`: حذف ريكورد.

الملف:
- `app/Http/Controllers/ProdectWebController.php`

## 2) إعداد Routes للـ Web

تم ربط كل العمليات السابقة في `routes/web.php`:

- `GET /` لعرض صفحة الكنترول (الرئيسية).
- `GET /ProdectWebController` قائمة الريكوردات.
- `GET /prodects/create` صفحة الإضافة.
- `POST /prodects` حفظ جديد.
- `GET /prodects/{prodect}/edit` صفحة التعديل.
- `PUT /prodects/{prodect}` حفظ التعديل.
- `DELETE /prodects/{prodect}` حذف.

## 3) صفحات واجهة الكنترول (Blade)

تم إنشاء/تعديل الصفحات التالية:

- `resources/views/prodects/index.blade.php`
  - عرض البيانات في جدول.
  - أزرار `Edit` و`Delete` لكل ريكورد.
  - عرض صورة المنتج.
  - زر `Logout`.
- `resources/views/prodects/create.blade.php`
  - فورم إضافة مع رفع صورة.
- `resources/views/prodects/edit.blade.php`
  - فورم تعديل مع إمكانية تغيير الصورة وعرض الحالية.

## 4) إضافة رفع الصورة لكل ريكورد

تم تنفيذ دعم الصور بالكامل:

1. إضافة عمود `image` في جدول `prodects` عبر Migration:
   - `database/migrations/2026_02_27_220000_add_image_to_prodects_table.php`
2. تحديث الموديل:
   - إضافة `image` في `$fillable` داخل `app/Models/Prodect.php`
3. تحديث Validation:
   - `app/Http/Requests/ProdectStoreRequest.php`
   - القواعد: `image`, `mimes:jpg,jpeg,png,webp`, `max:2048`
   - الصورة مطلوبة في `POST` واختيارية في `PUT`.
4. تحديث الكنترولر:
   - رفع الصورة في `store`.
   - استبدال الصورة القديمة في `update` عند رفع جديدة.
   - حذف الصورة من التخزين عند حذف الريكورد في `destroy`.
5. إنشاء الرابط للملفات:
   - `php artisan storage:link`

## 5) صور وهمية تلقائية عبر Factory

تم تعديل:
- `database/factories/ProdectFactory.php`

ليقوم بإنشاء صورة SVG وهمية تلقائيًا لكل ريكورد جديد، وتخزينها داخل:
- `storage/app/public/prodects`

مع حفظ المسار في عمود `image`.

## 6) تحديث الريكوردات القديمة بصور وهمية

تم إنشاء Seeder مخصص:
- `database/seeders/BackfillProdectImagesSeeder.php`

وظيفته:
- البحث عن الريكوردات التي ليس لها صورة (`image` فارغ أو `null`).
- إنشاء صورة SVG وهمية.
- تحديث عمود `image`.

تم تشغيله للتحويل الفعلي للبيانات القديمة.

## 7) نظام حماية وتسجيل دخول بمستخدم واحد فقط

تم تنفيذ تسجيل دخول ثابت حسب طلبك:

- Username: `remon`
- Password: `1122`

التنفيذ:

1. Middleware للحماية:
   - `app/Http/Middleware/EnsureSimpleAuth.php`
2. Controller للدخول والخروج:
   - `app/Http/Controllers/AuthController.php`
3. تسجيل Alias للـ middleware في:
   - `bootstrap/app.php`
4. صفحة Login:
   - `resources/views/auth/login.blade.php`
5. حماية كل مسارات الكنترول بـ `simple.auth` في:
   - `routes/web.php`
6. حماية مسارات الـ API أيضًا بنفس الجلسة لمنع أي تجاوز:
   - `routes/api.php` باستخدام `['web', 'simple.auth']`

## 8) أوامر تم استخدامها أثناء التنفيذ

- `php artisan route:list --path=prodects`
- `php artisan migrate --force`
- `php artisan storage:link`
- `php artisan db:seed --class=BackfillProdectImagesSeeder`
- `php -l <file>` للتحقق من سلامة ملفات PHP.

## 9) Checklist مرجعي سريع لإنشاء أي API مشابه

1. أنشئ Migration للجداول والحقول المطلوبة.
2. أنشئ Model واضبط `$fillable`.
3. أنشئ FormRequest للـ validation.
4. أنشئ Controller CRUD (index/store/show/update/destroy).
5. أضف routes (`apiResource` أو routes مخصصة).
6. إذا في ملفات (صور/مرفقات):
   - خزنها على `public` disk.
   - نفذ `php artisan storage:link`.
   - احذف الملفات القديمة عند التحديث والحذف.
7. أضف Seeder/Factory لبيانات تجريبية.
8. أضف Authorization/Middleware قبل فتح الـ API.
9. اختبر المسارات بـ `route:list` والطلبات عبر Postman.
10. وثّق كل خطوة في ملف مرجعي مثل هذا.

## 10) ملاحظات مهمة للتوسعة لاحقًا

- نظام الدخول الحالي بسيط ومخصص لمستخدم واحد فقط (Hardcoded).
- للإنتاج الحقيقي يفضّل استخدام Laravel Auth / Sanctum / Passport مع Users حقيقيين وصلاحيات Roles/Permissions.
- يفضّل توحيد التسمية لاحقًا من `Prodect` إلى `Product` لتسهيل الصيانة.
