<?php if (session()->has('errors')) : ?>
    <div class="alert alert-error">
        <p><strong>Terdapat kesalahan validasi:</strong></p>
        <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>