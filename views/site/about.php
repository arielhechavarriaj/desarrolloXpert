<?php
use aki\vue\Vue;
use yii\web\JsExpression;

?>
<?php
Vue::begin([
    'id' => "vue_app",
    'data' => [
        'message' => "hello world!!",
        'seen' => true,
        'todos' => [
            ['text' => "akbar joudi"],
            ['text' => "aref mohhamdzadeh"]
        ]
    ],
    'methods' => [
        'reverseMessage' => new yii\web\JsExpression("function(){"
            . "this.message = this.message.split('').reverse().join(''); "
            . "}"),
    ],
    'watch' => [
        'message' => new JsExpression('function(newval, oldval){
            console.log(newval)
        }'),
    ]
]); ?>

    <p>{{ message }}</p>
    <button v-on:click="reverseMessage">Reverse Message</button>

    <p v-if="seen">Now you see me</p>


    <ol>
        <li v-for="todo in todos">
            {{ todo.text }}
        </li>
    </ol>

    <p>{{ message }}</p>
    <input v-model="message">


<?php Vue::end(); ?>