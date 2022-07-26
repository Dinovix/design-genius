<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout title="Product Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Product Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head :title="`${form.name}`" />
						<div class="flex justify-start mb-8 max-w-3xl">
							<h1 class="text-3xl font-bold">
								<Link
									class="text-indigo-400 hover:text-indigo-600"
									href="/admin/products"
									>Products</Link
								>
								<span class="text-indigo-400 font-medium"
									>/</span
								>
								{{ form.name }}
							</h1>
							<img
								v-if="product.thumbnail"
								class="block ml-4 w-8 h-8 rounded-full"
								:src="product.thumbnail"
							/>
						</div>
						<!-- <trashed-message
							v-if="product.deleted_at"
							class="mb-6"
							@restore="restore"
						>
							This product has been deleted.
						</trashed-message> -->
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="update">
								<div class="flex flex-wrap -mb-8 -mr-6 p-8">
                                    
									<text-input
										v-model="form.name"
										:error="form.errors.name"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Name"
									/>
									<select-input
										v-model="form.category_id"
										:error="form.errors.category_id"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Product Category"
									>
										<option :value="null" />
										<option v-for="category in categories" :value="category.id">{{ category.name }}</option>
									</select-input>
                                    <select-input
										v-model="form.discount_id"
										:error="form.errors.discount_id"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Discount"
									>
										<option :value="null" />
										<option v-for="discount in discounts" :value="discount.id">{{ discount.name }}</option>
									</select-input>
									<text-input
										v-model="form.sale_price"
										:error="form.errors.sale_price"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Sale Price"
                                        type="number"
									/>
                                    <select-input
										v-model="form.is_rentable"
										:error="form.errors.is_rentable"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Rentable"
									>
										<option :value="null" />
										<option value="0">NO</option>
										<option value="1">YES</option>
									</select-input>
									<text-input
										v-model="form.rent_price"
										:error="form.errors.rent_price"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        type="number"
										label="Rent Price"
									/>
                                    <text-input
										v-model="form.weight"
										:error="form.errors.weight"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        type="number"
										label="Weight(Kg)"
									/>
									<text-input
										v-model="form.available_colors"
										:error="form.errors.available_colors"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Available Colors"
									/>
                                    <textarea-input
										v-model="form.cart_description"
										:error="form.errors.cart_description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Cart Description"
									/>
                                    <textarea-input
										v-model="form.short_description"
										:error="form.errors.short_description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Short Description"
									/>
                                    <textarea-input
										v-model="form.long_description"
										:error="form.errors.long_description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Long Description"
									/>
                                    <textarea-input
										v-model="form.features"
										:error="form.errors.features"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Features"
									/>
                                    <text-input
										v-model="form.quantity"
										:error="form.errors.quantity"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        type="number"
										label="Quantity"
									/>
                                    <text-input
										v-model="form.location"
										:error="form.errors.location"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Location"
									/>
									<select-input
										v-model="form.active"
										:error="form.errors.active"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Visible"
									>
										<option :value="false">No</option>
										<option :value="true">Yes</option>
									</select-input>
									<file-input
										v-model="form.thumbnail"
										:error="form.errors.thumbnail"
										class="pb-8 pr-6 w-full lg:w-1/2"
										type="file"
										accept="image/*"
										label="Product Image"
									/>
								
                                </div>
								<div
									class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<button
										v-if="!product.deleted_at"
										class="text-red-600 hover:underline"
										tabindex="-1"
										type="button"
										@click="destroy"
									>
										Delete product
									</button>
									<loading-button
										:loading="form.processing"
										class="btn-indigo ml-auto"
										type="submit"
										>Update Product</loading-button
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
		product: Object,
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				_method: "put",
				name: this.product.name,
				category_id: this.product.category_id,
				discount_id: this.product.discount_id,
				sale_price: this.product.sale_price,
				is_rentable: this.product.is_rentable,
				rent_price: this.product.rent_price,
				weight: this.product.weight,
				available_colors: this.product.available_colors,
				cart_description: this.product.cart_description,
				short_description: this.product.short_description,
				long_description: this.product.long_description,
				features: this.product.features,
				quantity: this.product.quantity,
				location: this.product.location,
				active: this.product.active,
				thumbnail: null,
			}),
		};
	},
	methods: {
		update() {
			this.form.post(`/admin/products/${this.product.id}`, {
				onSuccess: () => this.form.reset("thumbnail"),
			});
		},
		destroy() {
			if (confirm("Are you sure you want to delete this product ?")) {
				this.$inertia.delete(`/admin/products/${this.product.id}`);
			}
		},
		restore() {
			if (confirm("Are you sure you want to restore this product?")) {
				this.$inertia.put(`/products/${this.product.id}/restore`);
			}
		},
	},
};
</script>
