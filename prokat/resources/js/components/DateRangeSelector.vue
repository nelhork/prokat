<script setup>
import {ref} from 'vue';

const formatDate = (date) =>
{
    return date.toISOString().split('T')[0];
}

const today = new Date();
const tomorrow = new Date(today);
tomorrow.setDate(today.getDate() + 1);

const startDate = ref(formatDate(today));
const endDate = ref(formatDate(tomorrow));

const emit = defineEmits(["periodChanged"]);

const onDateChange = () =>
{
    const start = Date.parse(startDate.value);
    const end = Date.parse(endDate.value);

    const diffInMs = end - start;
    const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

    emit('periodChanged', diffInDays);
}

</script>

<template>
    <div class="mb-3">
        <label for="begin_at" class="form-label">Дата начала аренды</label>
        <input
            name="begin_at"
            type="date"
            class="form-control"
            id="begin_at"
            v-model="startDate"
            maxlength="255"
            @input="onDateChange"
        >
    </div>
    <div class="mb-3">
        <label for="end_at" class="form-label">Дата окончания аренды</label>
        <input name="end_at"
               type="date"
               class="form-control"
               id="end_at"
               v-model="endDate"
               maxlength="255"
               @input="onDateChange"
        >
    </div>
</template>
