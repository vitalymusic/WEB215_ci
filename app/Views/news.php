<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title><?=$title?></title>

    <script>
          async function loadComments(id,element){
                let result = await fetch(`<?=base_url("get_news_comments")?>/${id}`);
                let data = await result.json();
                    if(data.answer==true){
                    for (comments of data.comments){
                    element.innerHTML +=`
                        <div class="comment">
                            <p>Name: ${comments.name}</p>
                            <p>Email: ${comments.email}</p>
                            <p>Comment: <br> ${comments.comment}</p>
                        </div>
                    `;
                    }
                }else{
                     element.innerHTML +=`
                        <div class="comment">
                            <h5>No comments yet...</h5>
                        </div>
                    `;
                }
            }


            document.addEventListener("DOMContentLoaded",()=>{

                     document.querySelectorAll(".comments").forEach((element,number)=>{     
                        let id = element.dataset.id;
                        loadComments(id,element);
                    })  
                    
                 
                    
                   let forms = document.querySelectorAll('.comment_form');
                    
                   for(form of forms){
                       
                            form.onsubmit = (e)=>{
                            e.preventDefault();
                            //console.log(e.target);
                            data = new FormData(e.target);
                            sendData(e.target);
                        }
                    }

                   

                    async function sendData(elem){
                                let result = await fetch(`<?=base_url("add_comment")?>`,{
                                      method: "POST",
                                      body:  data
                                });
                                let answer = await result.json();

                                if(answer.success==true){
                                    elem.reset();
                                    window.location.replace("<?=base_url()?>")

                                }
                            }




            })




           
    </script>
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
                <div class="comments" data-id="<?=$item->id?>">
                   
                </div>
                <div class="form">
                    <form class="comment_form">
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