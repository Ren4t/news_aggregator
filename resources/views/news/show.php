<h1>News aggregator</h1>
<div style="display: flex; justify-content: flex-end">
    <a href="<?=route('main')?>">Главная</a>
</div>
<div style="border: 1px solid green; margin: 2px">
    <h2><?=$news['title']?></h2>
    <p><?=$news['description']?></p>
    <div>
        <strong><?=$news['autor']?> (<?=$news['created_at']?>)</strong>
    </div>
</div>

