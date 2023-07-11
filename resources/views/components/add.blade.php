<button id="createProductButton" wire:click="showForm"
    class="text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary focus:outline-none dark:focus:ring-primary-800"
    type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default"
    aria-controls="drawer-create-product-default" data-drawer-placement="right">
    Add {{ $name }}
</button>