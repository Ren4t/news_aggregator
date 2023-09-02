<?php foreach($news as $n): ?>
<div style="border: 1px solid green; margin: 2px">
    <h2><?=$n['title']?></h2>
    <p><?=$n['description']?></p>
    <div>
        <strong><?=$n['autor']?> (<?=$n['created_at']?>)</strong>
    </div>
    <a href="<?=route('news.show',['id' => $n['id']])?>">Подробнее</a>
</div>
<?php endforeach; ?>


