<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout title="Order Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Order Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head :title="`${form.full_name}`" />
						<div class="flex justify-start mb-8 max-w-3xl">
							<h1 class="text-3xl font-bold">
								<Link
									class="text-slate-400 hover:text-slate-600"
									href="/admin/orders"
									>Orders</Link
								>
								<span class="text-slate-400 font-medium"
									>/</span
								>
								{{ form.full_name }}
							</h1>
						</div>
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="update">
								<div class="flex flex-wrap -mb-8 -mr-6 p-8">
                                    <text-input
										v-model="form.total_price"
										:error="form.errors.total_price"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        type="number"
                                        disabled
										label="Total Price"
									/>
                                    <text-input
										v-model="form.sponsor_info"
										:error="form.errors.sponsor_info"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        disabled
										label="Sponsor Info"
									/>
                                    <select-input
										v-model="form.paid"
										:error="form.errors.paid"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Paid"
									>
										<option :value="null" />
                                        <option value="0">Not Paid</option>
                                        <option value="1">Paid</option>
									</select-input>
                                    <select-input
										v-model="form.shipped"
										:error="form.errors.shipped"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Shipped"
									>
										<option :value="null" />
                                        <option value="0">Not Shipped</option>
                                        <option value="1">Shipped</option>
									</select-input>
                                    <textarea-input
										v-model="form.description"
										:error="form.errors.description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Order Description"
                                        disabled
									/>

                                    <div class="w-full overflow-x-auto relative shadow-md sm:rounded-lg my-4">
                                        <table class="w-full text-sm text-lef">
                                            <caption>Order Details</caption>
                                            <thead class="text-xs uppercase">
                                                <tr>
                                                    <th scope="col" class="py-3 px-6">
                                                        Product name
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        Quantity
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        Discount Amount
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        Product Price
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        Order Price
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="product in products" v-bind:key="product.id+'-prod'" class="bg-white border-b ">
                                                    <th scope="row" class="py-4 px-6 font-medium">
                                                        {{ product.name }}
                                                    </th>
                                                    <td class="py-4 px-6">
                                                        {{ product.order_quantity }}
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        - {{ product.order_discount_amount }}
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        FCFA {{ product.order_type == 'SALE' ? product.sale_price : product.rent_price }}
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        FCFA {{ product.order_price }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


									<text-input
										v-model="form.full_name"
										:error="form.errors.full_name"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Client"
                                        disabled
									/>
                                    <text-input
										v-model="form.email"
										:error="form.errors.email"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Client Email"
                                        disabled
									/>
                                    <text-input
										v-model="form.phone"
										:error="form.errors.phone"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Client Phone"
									/>
                                    <text-input
										v-model="form.pobox"
										:error="form.errors.pobox"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="PO BOX"
									/>
                                    <text-input
										v-model="form.city"
										:error="form.errors.city"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="city"
									/>
                                    <text-input
										v-model="form.delivery_address"
										:error="form.errors.delivery_address"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Delivery Address"
									/>

                                </div>
								<div
									class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<button
										v-if="!order.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete Order
									</button>
									<loading-button
										:loading="form.processing"
										class="btn-slate ml-auto"
										type="submit"
										>Update Order</loading-button
									>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import TextInput from "@/Shared/TextInput";
import TextareaInput from "@/Shared/TextareaInput";
import FileInput from "@/Shared/FileInput";
import SelectInput from "@/Shared/SelectInput";
import LoadingButton from "@/Shared/LoadingButton";
import TrashedMessage from "@/Shared/TrashedMessage";

export default {
	components: {
		FileInput,
		Head,
		Link,
		LoadingButton,
		SelectInput,
		TextInput,
		TextareaInput,
		TrashedMessage,
	},
	props: {
		user: Object,
		products: Object,
		order: Object,
        sponsor_info : String
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
                total_price: this.order.total_price,
                sponsor_info: this.sponsor_info,
                full_name: this.user.full_name,
                email: this.user.email,
                phone: this.order.phone,
                pobox: this.order.po_box,
                city: this.order.city,
                delivery_address: this.order.delivery_address,
                paid: this.order.paid,
                shipped: this.order.shipped,
                description: this.order.description
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/orders/${this.order.id}`, {
				//
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this order ?")) {
				this.$inertia.delete(`/admin/orders/${this.order.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this order?")) {
				this.$inertia.put(`/admin/orders/${this.order.id}/restore`);
			}
		},
	},
};
</script>
