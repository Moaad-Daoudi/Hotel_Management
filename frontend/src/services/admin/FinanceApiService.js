import api from '@/services/api';

class FinanceApiService {
    /**
     * Fetches a list of invoices with filters.
     * @param {object} filters - { status, start_date, end_date, page }
     * @returns {Promise<object>}
     */
    fetchInvoices(filters) {
        // Logic: GET from '/api/back-office/finance/invoices' with filters.
        return api.get('/back-office/finance/invoices', { params: filters });
    }

    /**
     * Fetches a single invoice's details.
     * @param {number} invoiceId
     * @returns {Promise<object>}
     */
    fetchInvoiceDetails(invoiceId) {
        // Logic: GET from `/api/back-office/finance/invoices/${invoiceId}`.
        return api.get(`/back-office/finance/invoices/${invoiceId}`);
    }

    /**
     * Records a manual payment against a booking or invoice.
     * @param {object} paymentData - { booking_id, amount, method, notes }
     * @returns {Promise<object>}
     */
    recordPayment(paymentData) {
        // Logic: POST to '/api/back-office/finance/payments' with paymentData.
        return api.post('/back-office/finance/payments', paymentData);
    }

    /**
     * Generates a financial report.
     * @param {object} reportParams - { report_type, start_date, end_date }
     * @returns {Promise<object>}
     */
    fetchFinancialReport(reportParams) {
        // Logic: GET from '/api/back-office/finance/financial-report' with reportParams.
        return api.get('/back-office/finance/financial-report', { params: reportParams });
    }
}

export default new FinanceApiService();
