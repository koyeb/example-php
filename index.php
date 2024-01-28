<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>快捷计算</title>
    <style>
    
    /* 容器向上移动 */
    .container {
        margin-top: 50px;
    }
    /* 输入框之间的垂直间距 */
    input[type="text"] {
        margin-bottom: 3px;
    }
       
        /* 输入框样式 */
        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 200px;
        }
        /* 设置字体为宋体 */
        body {
            font-family: "宋体", SimSun, serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <center><h1>输入计算</h1>
            <form method="post" action="">
                <label for="num1">1#当前电量：</label>
                <input type="text" name="num1" required><br>

                <label for="num2">1#之前电量：</label>
                <input type="text" name="num2" required><br>

                <label for="num3">2#当前电量：</label>
                <input type="text" name="num3" required><br>

                <label for="num4">2#之前电量：</label>
                <input type="text" name="num4" required><br>
                                                                    </center>
                <button type="submit" style="font-size: 20px; padding: 8px 20px; display: block; margin: 0 auto;">计算</button>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 获取用户输入的数字，确保转换为字符串
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
        $num4 = $_POST["num4"];

        // 设置BC Math计算的小数点精度
        bcscale(12);

        // 计算
        $diff1 = bcsub($num1, $num2);
        $sum1 = bcmul($diff1, "400");

        $diff2 = bcsub($num3, $num4);
        $sum2 = bcmul($diff2, "400");

        // 显示输入的数字和计算结果
        echo "<p>数据比对</p>";
        echo "<p>1#当前电量: $num1</p >";
        echo "<p>1#之前电量: $num2</p >";
        echo "<p>2#当前电量: $num3</p >";
        echo "<p>2#之前电量: $num4</p >";
        echo "<p>厂前变 1#$sum1 &nbsp 2#$sum2</p >";
        $value = $sum1;
        $integerValue = intval($value);

        $value1 = $sum2;
        $integerValue1 = intval($value1); // 或者使用 round($value1, 0)
        echo "<p>厂前变 1#$integerValue &nbsp 2#$integerValue1</p >";
        // 判断并显示结果
        if ($sum1 == $integerValue && $sum2 == $integerValue1) {
            echo "<p>数据正确</p >";
        } else {
            echo "<p>计算结果不正确，不可使用</p >";
            echo "<p>计算结果不正确，不可使用</p >";
        }
    }
    ?>
</body>
</html>