<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>صفحة التسجيل</title>
</head>
<body>
    <form id="registrationForm" onsubmit="return submitForm()">
        <label for="fullName">الاسم:</label>
        <input type="text" id="fullName" name="fullName" required><br><br>
        <label for="nationalId">الرقم القومي:</label>
        <input type="text" id="nationalId" name="nationalId" required><br><br>
        <label for="gender">الجنس:</label>
        <select id="gender" name="gender" required>
            <option value="ذكر">ذكر</option>
            <option value="أنثى">أنثى</option>
        </select><br><br>
        <label for="age">العمر:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="address">العنوان:</label>
        <input type="text" id="address" name="address" required><br><br>
        <label for="clinic">العيادة:</label>
        <select id="clinic" name="clinic" required>
            <option value="رمد">رمد</option>
            <option value="صدر">صدر</option>
        </select><br><br>
        <button type="submit">تسجيل</button>
    </form>

    <script>
        function submitForm() {
            var formData = new FormData(document.getElementById("registrationForm"));
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href = "profile.php?" + formData.get("nationalId");
                }
            };
            xhr.open("POST", "save_data.php", true);
            xhr.send(formData);
            return false;
        }
    </script>
</body>
</html>
