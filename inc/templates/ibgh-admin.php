<div style="padding: 30px 10px;">
    <h1>Informações de contato</h1>
    <?php settings_errors(); ?>
    <form id="submitForm" method="post" action="options.php" class="ibgh-general-form">
        <?php settings_fields ( 'ibgh-settings-group' ); ?>
        <?php do_settings_sections('alecaddd_ibgh'); ?>
        <?php submit_button(); ?>
   </form>
</div>
