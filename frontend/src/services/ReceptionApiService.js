import api from '@/services/api';

class ReceptionApiService {
    fetchBookings(filters) {
        // Logic: GET from '/api/back-office/reception/bookings' with filters.
        return api.get('/back-office/reception/bookings', { params: filters });
    }
    fetchBookingDetails(bookingId) {
        // Logic: GET from `/api/back-office/reception/bookings/${bookingId}`.
        return api.get(`/back-office/reception/bookings/${bookingId}`);
    }
    performCheckIn(bookingId, roomId = null) {
        // Logic: POST to `/api/back-office/reception/check-in` with { booking_id, room_id? }.
        return api.post(`/back-office/reception/bookings/${bookingId}/check-in`, { room_id: roomId });
    }
    performCheckOut(bookingId) {
        // Logic: POST to `/api/back-office/reception/bookings/${bookingId}/check-out`.
        return api.post(`/back-office/reception/bookings/${bookingId}/check-out`);
    }
}

export default new ReceptionApiService();
