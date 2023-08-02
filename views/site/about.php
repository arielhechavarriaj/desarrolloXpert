<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>


<main id="main" class="flex-shrink-0" role="main">
    <div class="container" id="app">
        <h1>{{ message }}</h1>
    </div>
</main>

<script>
    // Vue app
    const app = Vue.createApp({
        data() {
            return {
                message: 'Hello, Vue.js in Yii!'
            }
        }
    });

    // Mount Vue app to the element with ID 'app'
    app.mount('#app');
</script>
