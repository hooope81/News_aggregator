<?php if (count($news) > 0): ?>
<?php foreach ($news as $n): ?>
    <div style="border: 1px solid lightseagreen">
        <h2><?=$n['title']?></h2>
        <p><?=$n['description']?></p>
        <div><strong><?=$n['author']?> (<?=$n['created_at']?>)</strong></div>
        <a href="<?= route('news.show', ['id' => $n['id']])?>">Далее</a>
    </div>
<?php endforeach; ?>
<?php else: ?>
    <h2>Новости по данной категории отсутствуют</h2>
<?php endif; ?>
