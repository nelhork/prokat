<script setup>
import {computed, ref} from 'vue';
import debounce from "../utils";
import DateRangeSelector from "./DateRangeSelector.vue";
import {OrderModel} from "./OrderModel";

const props = defineProps(['models', 'deliveryPrice']);

const models = ref([]);
const searchString = ref('');
const period = ref(1);
const deliveryPrice = ref(Number(props.deliveryPrice));
const orderModels = ref([]);

console.log(props.models);

props.models.forEach((model) =>
{
   const orderModel = OrderModel.fromDb(model);
   orderModels.value.push(orderModel);
});

const onInput = debounce(() =>
{
    models.value = [];
    if (searchString.value.length >= 5)
    {
        fetch(`http://localhost/models/search?name=${searchString.value}`)
            .then(response => response.json())
            .then(data =>
            {
                models.value = data.models;
            });
    }
}, 1000);

const addModel = async (model) =>
{
    if (!isModelSelected(model.id))
    {
        const pricelist = await OrderModel.getPricelist(period.value, model.id);
        const orderModel = new OrderModel(model, pricelist);
        orderModels.value.push(orderModel);
    }
}

const isModelSelected = (modelId) =>
{
    return orderModels.value.find(model => model.id === modelId);
};

const removeModel = (modelId) =>
{
    orderModels.value = orderModels.value.filter(model => model.id !== modelId)
}

const onPeriodChanged = async (newPeriod) =>
{
    orderModels.value.forEach(async model =>
    {
        const pricelist = await OrderModel.getPricelist(newPeriod, model.id);
        model.updatePrices(pricelist);
    });
}

const totalPrice = computed(() =>
{
    return orderModels.value.reduce((sum, model) => sum + Number(model.totalPrice), 0);
});

const totalDeposit = computed(() =>
{
    return orderModels.value.reduce((sum, model) => sum + Number(model.totalDeposit), 0);
});

const totalSum = computed(() =>
{
   return Number(totalPrice.value) + Number(totalDeposit.value) + deliveryPrice.value;
});

</script>

<template>
    <div class="mb-3">
        <label for="modelSelector">Добавить модель</label>
        <input
            id="modelSelector"
            class="form-control"
            type="text"
            placeholder="Название модели"
            v-model="searchString"
            @input="onInput"
        >
    </div>
    <ul class="mb-3 list-group model-selector__list">
        <li
            v-for="model in models"
            :key="model.id"
            @click="addModel(model)"
            class="list-group-item model-selector__item d-flex justify-content-between"
            :class="{'bg-dark-subtle' : isModelSelected(model.id)}"
        >
            {{ model.name }}
            <i class="bi bi-plus-circle" v-if="!isModelSelected(model.id)"></i>
        </li>
    </ul>
    <div class="mb-3">
        <div v-for="model in orderModels" class="row align-items-end mb-3">
            <div class="col">
                {{ model.name }}
            </div>
            <div class="col">
                <input
                    type="number"
                    class="form-control"
                    placeholder="Кол-во"
                    v-model="model.qty"
                    required
                >
            </div>
            <div class="col">
                <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    placeholder="Аренда"
                    :value="model.totalPrice"
                    @input="model.customPrice=$event.target.value"
                    required
                >
            </div>
            <div class="col">
                <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    placeholder="Депозит"
                    :value="model.totalDeposit"
                    @input="model.customDeposit=$event.target.value"
                    required
                >
            </div>
            <div class="col">
                <button type="button" class="btn btn-danger" @click="removeModel(model.id)">✕</button>
            </div>
        </div>
    </div>
    <DateRangeSelector @period-changed="onPeriodChanged"></DateRangeSelector>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-3 offset-md-6 text-end">Сумма аренды</div>
            <div class="col-md-3">
                <input
                    name="total_amount"
                    type="number"
                    step="0.01"
                    id="sum-rent"
                    class="form-control"
                    :value="totalPrice"
                    readonly
                >
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3 offset-md-6 text-end">Сумма залога</div>
            <div class="col-md-3">
                <input
                    name="total_deposit"
                    type="number"
                    step="0.01"
                    id="sum-deposit"
                    class="form-control"
                    :value="totalDeposit"
                    readonly>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3 offset-md-6 text-end">Стоимость доставки</div>
            <div class="col-md-3">
                <input
                    name="delivery_price"
                    type="number"
                    step="0.01"
                    id="delivery-price"
                    class="form-control"
                    v-model.number="deliveryPrice"
                >
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3 offset-md-6 text-end">Итого:</div>
            <div class="col-md-3">
                <input
                    type="text"
                    id="sum-total"
                    class="form-control"
                    :value="totalSum"
                    readonly>
            </div>
        </div>
    </div>
    <div v-for="(model, index) in orderModels">
        <input type="hidden" :name="`models[${index}][id]`" :value="model.id">
        <input type="hidden" :name="`models[${index}][count]`" :value="model.qty">
        <input type="hidden" :name="`models[${index}][price]`" :value="model.totalPrice">
        <input type="hidden" :name="`models[${index}][deposit]`" :value="model.totalDeposit">
    </div>
</template>
