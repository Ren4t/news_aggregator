<h1>News aggregator</h1>
<div style="display: flex; justify-content: flex-end">
    <a href="<?=route('main')?>">Главная</a>
</div>
<h2>Category</h2>
<div style="border: 1px solid green; margin: 2px">
    <h2><?=$categories['title']?></h2>
</div>
<h2>News</h2>
<?php foreach($news as $n): ?>
<?php if($n['category_id'] === $categories['id']):?>
<div style="border: 1px solid green; margin: 2px">
    <h2><?=$n['title']?></h2>
    <p><?=$n['description']?></p>
    <div>
        <strong><?=$n['autor']?> (<?=$n['created_at']?>)</strong>
    </div>
    <a href="<?=route('news.show',['id' => $n['id']])?>">Подробнее</a>
</div>
<?php endif; ?>
<?php endforeach; ?>
