<template>
    <div>This message is coming from the ExampleVue component. You passed the value "{{ name }}" as input.</div>
</template>

<script setup>
    defineProps({
        name: String
    });
</script>
