<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الاداري</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="../style.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="text-2xl text-center text-white p-4 bg-gray-800">
      <h> نظام ادارة العيادة</h>
    </div>
    <div class="flex min-h-screen">
      <div class="md:w-64 w-full bg-gray-800 text-white hidden md:block">
        <div class="flex py-4 px-6">
          <span class="text-xl font-bold">لوحة التحكم</span>
        </div>
        <ul class="mt-6">
            <li class="py-2 px-4 rounded-md hover:bg-gray-700">
                <a href="dashboard.html">الرئيسية</a>
              </li>
           <li class="py-2 px-4 rounded-md hover:bg-gray-700">
             <a href="data.php">بيانات جميع المرضى </a>
           </li>
          <li class="py-2 px-4 rounded-md hover:bg-gray-700">
            <a href="index.html">حجز</a>
          </li>
          <li class="py-2 px-4 rounded-md hover:bg-gray-700">
            <a href="Clinics.html">العيادات </a>
          </li>
          <li class="py-2 px-4 rounded-md hover:bg-gray-700">
            <a href="employee.html">الموظفين</a>
          </li>
          <li class="py-2 px-4 rounded-md hover:bg-gray-700">
            <a href="resources.html">الموارد</a>
          </li>
        </ul>
      </div>
      <div class="w-full col-span-6">
        <div class="container mx-auto mt-10">
            <div class="flex justify-start items-center mb-4">
                <div class="flex">
                    <input type="text" id="searchInput" onkeyup="filterData()" placeholder="ابحث عن المريض..." class="border rounded-lg px-4 py-2 mr-2">
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">
                        <i class='bx bx-search'></i>
                    </button>
                </div>
                
            </div>
            <body>
            <h1 class="text-2xl font-bold mb-4 pl-4 pb-5">بيانات جميع المرضى</h1>
<div class="overflow-x-auto">
    <table class="table-auto border-collapse border border-black w-full pl-4">
        <thead>
            <tr>
                <th class="border border-black px-4 py-2">كود المريض</th>
                <th class="border border-black px-4 py-2">الاسم</th>
                <th class="border border-black px-4 py-2">الرقم الوطني</th>
                <th class="border border-black px-4 py-2">الجنس</th>
                <th class="border border-black px-4 py-2">العمر</th>
                <th class="border border-black px-4 py-2">العنوان</th>
                <th class="border border-black px-4 py-2">العيادة</th>
            </tr>
        </thead>
        <tbody id="dataList">
      
    </div>
</div>


</div>
<script>
  var dataList = JSON.parse(localStorage.getItem("dataList")) || [];
  var dataListContainer = document.getElementById("dataList");



  displayData(dataList); // Initial display of all data

  function filterData() {
      var searchInput = document.getElementById("searchInput").value.toLowerCase();
      var filteredDataList = dataList.filter(function(data) {
          return data.name.toLowerCase().includes(searchInput);
      });
      displayData(filteredDataList);
  }
</script>


</body>
</html>

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dataclinic";

$connect_data = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "خطأ في الاتصال بقاعدة البيانات";
} else {
    $sql = "SELECT * FROM patient";
    $result = mysqli_query($connect_data, $sql);
    ?>

   
        <?php
         $counter = 1;
         while ($row = mysqli_fetch_assoc($result)) {
             ?>
             <tr>
                 <td class="border border-black px-4 py-2"><?php echo $row['id']; ?></td>
                 <td class="border border-black px-4 py-2"><?php echo $row['name']; ?></td>
                 <td class="border border-black px-4 py-2"><?php echo $row['national_id']; ?></td>
                 <td class="border border-black px-4 py-2"><?php echo $row['gender']; ?></td>
                 <td class="border border-black px-4 py-2"><?php echo $row['age']; ?></td>
                 <td class="border border-black px-4 py-2"><?php echo $row['adress']; ?></td>
                 <td class="border border-black px-4 py-2"><?php echo $row['clinic']; ?></td>
             </tr>
            <?php
        }
        ?>
    </table>

    <?php
}
?>

