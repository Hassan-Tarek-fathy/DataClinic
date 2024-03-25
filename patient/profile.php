<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>صفحة البروفايل</title>
</head>
<body>
    <div id="profileData"></div>

    <script>
        var nationalId = window.location.search.substring(1);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                document.getElementById("profileData").innerHTML = `
                    <p>الاسم: ${data.fullName}</p>
                    <p>الرقم القومي: ${data.nationalId}</p>
                    <p>الجنس: ${data.gender}</p>
                    <p>العمر: ${data.age}</p>
                    <p>العنوان: ${data.address}</p>
                    <p>العيادة: ${data.clinic}</p>
                `;
            }
        };
        xhr.open("GET", "get_data.php?nationalId=" + nationalId, true);
        xhr.send();
    </script>
</body>
</html>
