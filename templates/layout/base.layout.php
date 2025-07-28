<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max it - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'orange-maxit': '#FF7900',
                        'gray-light': '#F4F4F4',
                        'gray-medium': '#e5e5e5',
                        'text-gray': '#666666'
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans flex flex-col justify-center items-center border border-black">
      <div class="flex h-screen bg-white w-full h-full  overflow-x-auto rounded-lg shadow-xl bg-gray-200	">
         
    <?php require_once '../templates/layout/partial/leftbar.php'; ?>
        
        <div class="flex-1 flex flex-col">
    <?php require_once '../templates/layout/partial/header.html.php'; ?>
        <div class=" w-[1600px] grid grid-cols-4 mt-[40px] ml-[40px] gap-16  mb-[40px] ">
                    <div class="bg-gray-100 rounded-3xl h-28 shadow-lg "></div>
                    <div class="bg-gray-100 rounded-3xl h-28 shadow-lg"></div>
                    <div class="bg-gray-100 rounded-3xl h-28 shadow-lg"></div>
                    <div class="bg-gray-100 rounded-3xl h-28 shadow-lg"></div>
                </div>
            
    <main class="flex-1 p-6 ">
    <?php echo $contentForLayout ?>
</body>
</html>