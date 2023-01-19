<?php foreach ($categories as $item): ?>
    <div style="border: 1px solid lightseagreen">
        <h2><?=$item['id']?></h2>
        <h2><?=$item['title']?></h2>
        <a href="<?= route('categories.show', ['id' => $item['id']])?>">Далее</a>
    </div>
<?php endforeach; ?>
