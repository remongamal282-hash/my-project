# AI Execution Prompt Template (Reusable)

انسخ هذا النص كما هو لأي AI Coding Agent (مثل Codex/ChatGPT/Cursor) وعدّل فقط القيم بين الأقواس `<>`.

---

أنت تعمل على مشروع Laravel موجود مسبقًا. المطلوب تنفيذ نظام CRUD كامل (Web + API) لكيان واحد، مع مصادقة بسيطة بمستخدم واحد، ورفع صورة، وواجهة Blade، مع الالتزام بالنقاط التالية:

## 1) بيانات عامة

- Entity Name (Singular): `<EntitySingular>`  
  مثال: `Product`
- Entity Name (Plural): `<EntityPlural>`  
  مثال: `products`
- Model Class: `<ModelClass>`  
  مثال: `Product`
- Web Controller: `<WebControllerClass>`  
  مثال: `ProductWebController`
- API Controller: `<ApiControllerClass>`  
  مثال: `ProductController`

## 2) الحقول (مرنة وقابلة للتغيير)

نفّذ CRUD بناءً على القائمة التالية فقط.  
يمكن إضافة/حذف حقول حسب هذه القائمة بدون افتراض حقول ثابتة.

استخدم الشكل التالي لكل حقل:

- `<field_name>` | `<db_type>` | `<validation_rules>` | `<in_fillable yes/no>` | `<in_forms yes/no>` | `<in_table yes/no>`

مثال:
- `name` | `string` | `required|string|max:255` | `yes` | `yes` | `yes`
- `description` | `text` | `required|string` | `yes` | `yes` | `yes`
- `price` | `decimal:10,2` | `required|numeric` | `yes` | `yes` | `yes`
- `image` | `string nullable` | `nullable|image|mimes:jpg,jpeg,png,webp|max:2048` | `yes` | `yes` | `yes`

قائمة الحقول الفعلية:
`<PUT_FIELDS_HERE>`

## 3) المطلوب تنفيذه

1. إنشاء/تحديث Migrations بحسب الحقول الحالية.
2. تحديث Model وإضافة `$fillable` ديناميكيًا حسب الحقول التي `in_fillable=yes`.
3. إنشاء/تحديث FormRequest للتحقق (`store` و`update`).
4. إنشاء/تحديث Web Controller CRUD:
   - `index`, `create`, `store`, `edit`, `update`, `destroy`
5. إنشاء/تحديث API Controller CRUD كامل.
6. إنشاء/تحديث Routes:
   - Web routes للواجهات.
   - API routes للـ `apiResource`.
7. إنشاء/تحديث Blade views:
   - `index`, `create`, `edit`
   - عرض كل الحقول التي `in_table=yes`
   - إدخال/تعديل كل الحقول التي `in_forms=yes`
8. لو يوجد حقل صورة (type image/file):
   - استخدام `storage/app/public`
   - حفظ المسار في قاعدة البيانات
   - استبدال الصورة القديمة عند التحديث
   - حذف الصورة عند حذف الريكورد
   - التأكد من `php artisan storage:link`
9. إنشاء/تحديث Factory لتوليد بيانات وهمية لكل الحقول المطلوبة.
10. إنشاء Seeder للبيانات التجريبية.
11. إنشاء Seeder إضافي Backfill لتحديث السجلات القديمة عند إضافة حقول جديدة (خصوصًا الصور/القيم الفارغة).
12. التحقق النهائي:
   - `php -l` للملفات المعدلة
   - `php artisan route:list`
   - تشغيل migrations/seeders اللازمة

## 4) المصادقة المطلوبة (مستخدم واحد فقط)

طبّق Simple Auth Session-based كالتالي:

- صفحة login
- بيانات الدخول الثابتة:
  - username: `<STATIC_USERNAME>` (مثال: `remon`)
  - password: `<STATIC_PASSWORD>` (مثال: `1122`)
- Middleware يمنع الوصول لكل صفحات الكنترول وكل API الخاصة بالكيان إلا بعد تسجيل الدخول.
- إضافة Logout.
- لا يوجد أي مستخدم آخر أو أدوار.

## 5) قواعد مهمة أثناء التنفيذ

1. لا تفترض وجود أسماء حقول ثابتة؛ اعتمد فقط على `PUT_FIELDS_HERE`.
2. إذا تم حذف حقل من القائمة:
   - احذفه من validation/forms/table/fillable.
   - أضف migration مناسبة إن احتاج الأمر.
3. إذا تم إضافة حقل جديد:
   - أضفه end-to-end في كل طبقات النظام.
4. لا تترك أي route غير محمي لعمليات الإضافة/التعديل/الحذف.
5. أعطني في النهاية:
   - قائمة الملفات التي تغيرت.
   - الأوامر التي تم تشغيلها.
   - أي خطوة مطلوبة مني يدويًا.

## 6) شكل المخرجات المطلوبة منك

- ابدأ بالتنفيذ مباشرة (لا تكتفِ بالخطة).
- نفّذ كل التعديلات داخل المشروع.
- اختم برد مختصر فيه:
  - What changed
  - Verification done
  - Next manual step (إن وجدت)

---

## Quick Fill Example

- `<EntitySingular>` = `Product`
- `<EntityPlural>` = `products`
- `<ModelClass>` = `Product`
- `<WebControllerClass>` = `ProductWebController`
- `<ApiControllerClass>` = `ProductController`
- `<STATIC_USERNAME>` = `remon`
- `<STATIC_PASSWORD>` = `1122`
- `<PUT_FIELDS_HERE>` =
  - `name | string | required|string|max:255 | yes | yes | yes`
  - `description | text | required|string | yes | yes | yes`
  - `price | decimal:10,2 | required|numeric | yes | yes | yes`
  - `image | string nullable | nullable|image|mimes:jpg,jpeg,png,webp|max:2048 | yes | yes | yes`
