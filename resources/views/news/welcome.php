
<h1>Welcome to news aggregator</h1>
<div style="display: flex; justify-content: flex-end">
    <a href="<?=route('main')?>">Главная</a>
</div>
<h2>Category</h2>
<div style="display: flex; justify-content: space-between">
    <?php foreach($categories as $cat): ?>
<div style="border: 1px solid green; margin: 2px; width: 200px;" >
    <a href="<?=route('show.category.news',['id' => $cat['id']])?>"><h2><?=$cat['title']?></h2></a>
</div>
<?php endforeach; ?>
</div>

<h2>News</h2>
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

