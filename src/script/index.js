$(document).ready(() => {
  $("#keyword").on("keyup", () => {
    $(".datas").load("jquery/search.php?keyword=" + $("#keyword").val());
  });
});
