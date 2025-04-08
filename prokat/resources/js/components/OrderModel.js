export class OrderModel
{
    _id;
    _name;
    _price;
    _deposit;
    _qty;
    _customPrice = -1;
    _customDeposit = -1;

    get id()
    {
        return this._id;
    }

    get qty()
    {
        return this._qty;
    }

    set qty(newQty)
    {
        this._qty = newQty;
    }

    get name()
    {
        return this._name;
    }

    get price()
    {
        return this._price;
    }

    set price(newPrice)
    {
        this._price = newPrice;
    }

    get deposit()
    {
        return this._deposit;
    }

    set deposit(newDeposit)
    {
        this._deposit = newDeposit;
    }

    get totalPrice()
    {
        if (this._customPrice !== -1)
        {
            return this._customPrice;
        }
        return this._price * this._qty;
    }

    get totalDeposit()
    {
        if (this._customDeposit !== -1)
        {
            return this._customDeposit;
        }
        return this._deposit * this._qty;
    }

    set customPrice(value)
    {
        this._customPrice = value;
    }

    set customDeposit(value)
    {
        this._customDeposit = value;
    }

    static fromDb(model)
    {
        const orderModel = new OrderModel();

        orderModel._customPrice = Number(model.pivot.price);
        orderModel._customDeposit = Number(model.pivot.deposit);
        orderModel._id = model.id;
        orderModel._qty = Number(model.pivot.count);
        orderModel._name = model.name;

        return orderModel;
    }

    constructor(modelData, pricelist)
    {
        if (modelData && pricelist)
        {
            this._price = pricelist.price_for_period;
            this._deposit = pricelist.deposit_for_period;
            this._id = modelData.id;
            this._qty = 1;
            this._name = modelData.name;
        }
    }

    updatePrices(pricelist)
    {
        this._price = pricelist.price_for_period;
        this._deposit = pricelist.deposit_for_period;
    }

    static async getPricelist(period, modelId)
    {
        const url = `http://localhost/models/${modelId}/pricelists/for-period?period=${period}`;
        const response = await fetch(url);
        const pricelist = await response.json();
        return pricelist;
    }
}
