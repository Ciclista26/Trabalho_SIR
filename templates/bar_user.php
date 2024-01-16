<div class="px-xs-3 px-sm-4 py-75">
    <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">
        <div class="d-flex w-100 al-c jc-between">
            <div class="d-flex al-c">
                <div class="toggle_btn pr-2 d-lg-none" onclick="toggleSidebar()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="22" fill="#43555d" viewBox="0 0 448 512">
                        <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                    </svg>
                </div>
                <span class="small"><?= $title ?? NULL ?></span>
            </div>
            <div class="r-0">
                <span class="d-inline small px-2"><?= $user['name'] ?? null ?> <?= $user['lastname'] ?? null ?></span>
                <img class="img-profile rounded-circle" src="<?= !empty($user['foto']) ? $userPhotoPath : '/Trabalho_SIR/assets/image/default.jpg' ?>" />
            </div>
        </div>
    </nav>
</div>