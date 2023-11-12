<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/main.css">
    <title>Document</title>
</head>
<body>
    <div id="discussions">
            <?php
                include '../Models/LoginModel.php';
                $model = new LoginModel();
                $model->connect();
                $list_conv = $model->conversationRequest();
                if($list_conv != NULL){
                    foreach($list_conv->fetchAll(PDO::FETCH_ASSOC) as $item){
                        echo '<p id="'.$item["CreateurID"].'">' . $item["NomConversation"] . "</p>";
                    }
                }
                else{
                    echo "<p> Il n'y a aucune liste de conversation</p>";
                }
                
            ?>
    </div>
    <div id="chats">
        <div id="view">
            
        </div>
        <form action="">
            <input type="text">
            <input type="submit" value="Envoyer !">
        </form>
    </div>
</body>
</html>