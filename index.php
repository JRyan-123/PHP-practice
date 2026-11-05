<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PRACTICE</title>
    <style>
        body{
            background-color: #2d2d2d;
            color: white;
        }
        .section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        a {
            text-decoration: none;
            transition: .5s;
            padding: 10px 20px;
            border-radius: 12px;
            color: black;
            background-color: white;
            border: 1px solid white;
            
        }
        a:hover{
            color: white;
            background-color: #2d2d2d;
        }
        .list{
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: center;
            width: 250px;
        }
    </style>
</head>
<body>
    <div class="section">
        <div>
            <h1>MENU</h1>
            <div class="list">
                <a href="studentGrade.php">Student Grades Report</a>
                <a href="ATM.php">ATM MACHINE</a>
                <a href="MeanMedianMode.php">MeanMedianMode</a>
            </div>
            
        </div>
        
    </div>
</body>
</html>