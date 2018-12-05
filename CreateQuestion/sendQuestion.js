window.onload = function () {

    getQuestionInfo();

};

function getQuestionInfo() {
var data = <?php echo json_encode($_POST) ?>;

console.log(data);
}