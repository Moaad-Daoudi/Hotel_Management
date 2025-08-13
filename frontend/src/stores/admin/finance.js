import { defineStore } from 'pinia';
// import FinanceApiService from '@/services/Admin/FinanceApiService';

export const useAdminFinanceStore = defineStore('adminFinance', {
    state: () => ({
        invoices: [],
        pagination: {},
        currentInvoice: null,
        reportData: null,
        isLoading: false,
    }),
    actions: {
        // async loadInvoices(filters) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. Call `FinanceApiService.fetchInvoices(filters)`.
            // 3. Commit response to `this.invoices` and `this.pagination`.
            // 4. In `finally`, set `this.isLoading = false;`.
        // },
        // async loadInvoiceDetails(invoiceId) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. Call `FinanceApiService.fetchInvoiceDetails(invoiceId)`.
            // 3. Commit response to `this.currentInvoice`.
            // 4. In `finally`, set `this.isLoading = false;`.
        // },
        // async generateReport(reportParams) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. Call `FinanceApiService.fetchFinancialReport(reportParams)`.
            // 3. Commit response to `this.reportData`.
            // 4. In `finally`, set `this.isLoading = false;`.
        // }
    }
});
