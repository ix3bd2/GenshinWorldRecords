<template>
    <ul class="pagination">
        <li
            class="page-item"
            :class="{
                disabled: !view['hydra:previous'],
            }"
        >
            <button
                @click="$emit('previous', view['hydra:previous'])"
                :disabled="!view['hydra:previous']"
                type="button"
                class="btn-link page-link action-previous"
            >
                Previous
            </button>
        </li>

        <li
            class="page-item"
            :class="{
                disabled: !view['hydra:next'],
            }"
        >
            <button
                @click="$emit('next', view['hydra:next'])"
                :disabled="!view['hydra:next']"
                type="button"
                class="btn-link page-link action-next"
            >
                Next
            </button>
        </li>
    </ul>
</template>

<script>
export default {
props: {
        view: {
            type: Object,
            default: () => {},
        },
    },

    emits: [
        'previous',
        'next',
    ],
}
</script>

<style>
.pagination{
    float: right;
}
</style>