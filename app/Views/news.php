<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title><?=$title?></title>
</head>
<body>
    <?php include("menu.php") ?>
    <h1><?=$title?></h1>


    <?php 
      // dd($news);
    ?>

    <?php foreach($news as $item){ ?>
            <div class="content">
                <h3><?=$item->news_title ?></h3>
                <p><?=$item->news_content ?></p>
                <div class="comments">

                </div>
                <div class="form">
                    <form>
                        <input type="hidden" name="news_id" value="<?=$item->id?>">
                        <input type="text" name="name" id="" placeholder="Your name">
                        <input type="email" name="email" id="" placeholder="Your email">
                        <textarea name="comment" id="" placeholder="Comment"></textarea>
                        <input type="submit" value="Add comment">
                    </form>
                </div>
            </div>
    <?php } ?>
    
</body>
</html>