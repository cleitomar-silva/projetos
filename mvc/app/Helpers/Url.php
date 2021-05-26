<?php


class Url
{
    public static function redirecionar($url)
    {
        ?>
        <script language="javascript">
            document.location.href = "<?php echo URL.'/'.$url ?>";
        </script>
        <?
        die();
    }
}