<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VNPayController extends Controller
{

    public function payment()
    {
        return view("vnpay_create_payment");
    }


    public function createPayment(Request $request)
    {


        $vnp_TmnCode = "11BDAJY3";
        $vnp_HashSecret = "AUK1DAW3YL0LZZQ9RW1E0EVLIFW3T139";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://your_return_url";

        $vnp_TxnRef = $request->input('order_id');
        $vnp_OrderInfo = $request->input('order_desc');
        $vnp_OrderType = $request->input('order_type');
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = $request->input('language');
        $vnp_BankCode = $request->input('bank_code');
        $vnp_IpAddr = $request->ip();
        $vnp_ExpireDate = $request->input('txtexpire');
        $vnp_Bill_Mobile = $request->input('txt_billing_mobile');
        $vnp_Bill_Email = $request->input('txt_billing_email');
        $fullName = trim($request->input('txt_billing_fullname'));
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address = $request->input('txt_inv_addr1');
        $vnp_Bill_City = $request->input('txt_bill_city');
        $vnp_Bill_Country = $request->input('txt_bill_country');
        $vnp_Bill_State = $request->input('txt_bill_state');
        $vnp_Inv_Phone = $request->input('txt_inv_mobile');
        $vnp_Inv_Email = $request->input('txt_inv_email');
        $vnp_Inv_Customer = $request->input('txt_inv_customer');
        $vnp_Inv_Address = $request->input('txt_inv_addr1');
        $vnp_Inv_Company = $request->input('txt_inv_company');
        $vnp_Inv_Taxcode = $request->input('txt_inv_taxcode');
        $vnp_Inv_Type = $request->input('cbo_inv_type');

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,
            "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            "vnp_Bill_Email" => $vnp_Bill_Email,
            "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            "vnp_Bill_LastName" => $vnp_Bill_LastName,
            "vnp_Bill_Address" => $vnp_Bill_Address,
            "vnp_Bill_City" => $vnp_Bill_City,
            "vnp_Bill_Country" => $vnp_Bill_Country,
            "vnp_Inv_Phone" => $vnp_Inv_Phone,
            "vnp_Inv_Email" => $vnp_Inv_Email,
            "vnp_Inv_Customer" => $vnp_Inv_Customer,
            "vnp_Inv_Address" => $vnp_Inv_Address,
            "vnp_Inv_Company" => $vnp_Inv_Company,
            "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            "vnp_Inv_Type" => $vnp_Inv_Type
        ];

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo ($vnp_Url);
        }
    }

    public function create(Request $request)
    {

        $vnp_TmnCode = "11BDAJY3";
        $vnp_HashSecret = "AUK1DAW3YL0LZZQ9RW1E0EVLIFW3T139";
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/return-vnpay";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }


    public function response(Request $request)
    {
        $vnp_HashSecret =  env('VNP_HASHSECRET'); // Lấy giá trị từ file config
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $inputData = $request->query();
        unset($inputData['vnp_SecureHash']);

        ksort($inputData);
        $hashData = '';
        $i = 0;

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        return view('vnpay.response', [
            'inputData' => $inputData,
            'secureHash' => $secureHash,
            'vnp_SecureHash' => $vnp_SecureHash
        ]);
    }
}
