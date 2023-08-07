<template>
    <div>
        <!-- Acceder a las propiedades pasadas desde la vista -->
        <p>{{ prop1 }}</p>
        <p>{{ prop2 }}</p>
        <!-- Otro contenido del componente -->
    </div>
</template>

<script>
export default {
    props: ['prop1', 'prop2'],
    // Otras definiciones de componente aquí
};
</script>
