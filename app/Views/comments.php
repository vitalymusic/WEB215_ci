<div class="comments">
    <h3>Comments</h3>
    <?php foreach ($comments as $comment ):?>
        <h5><?=$comment->name?></h5>
        <p><?=$comment->email?></p>
        <p><?=$comment->comment?></p>
        
        
    <?php endforeach;?>    

</div>