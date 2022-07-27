<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

defineProps(["orders"]);
</script>

<template>
	<AppLayout title="Orders Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Orders Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
                <!-- TODO : Assert if admin can create orders -->
                <!-- <div class="flex items-right mb-6">
					<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="`/admin/orders/create`"> Create Order </a>
                </div> -->
						<Table
							:resource="orders"
							name="orders"
							preserve-scroll="table-top"
						>
							<template #cell(actions)="{ item: order }">
								<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="`/admin/orders/${order.id}/edit`"> Edit </a>
							</template>
						</Table>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
