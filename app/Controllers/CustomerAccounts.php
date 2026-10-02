<?php 
 
namespace App\Controllers; 
 
use App\Models\CustomerAccountModel; 
use CodeIgniter\Controller; 
 
class CustomerAccounts extends Controller 
{ 
    protected $customerModel; 
 
    public function __construct() 
    { 
        $this->customerModel = new CustomerAccountModel(); 
    } 
 
    public function index() 
    { 
        // Check if the user is logged in 
        if (session()->get('isLogged') !== true) { 
            return redirect()->to('/login') 
                ->with('error', 'Please log in first.'); 
        } 
 
        $keyword = $this->request->getGet('search'); 
        $status = $this->request->getGet('status'); 
        $type = $this->request->getGet('type'); 
 
        $perPage = 10; 
 
        if ($keyword) { 
            $accounts = $this->customerModel->searchAccounts($keyword, $perPage); 
        } elseif ($status) { 
            $accounts = $this->customerModel->getAccountsByStatus($status, $perPage); 
        } elseif ($type) { 
            $accounts = $this->customerModel->getAccountsByType($type, $perPage); 
        } else { 
            $accounts = $this->customerModel->getAccountsPaginated($perPage); 
        } 
 
        $data = [ 
            'accounts' => $accounts, 
            'pager' => $this->customerModel->pager, 
            'total_accounts' => $this->customerModel->getTotalAccounts(), 
            'active_accounts' => $this->customerModel->getCountByStatus('active'), 
            'inactive_accounts' => $this->customerModel->getCountByStatus('inactive'), 
            'suspended_accounts' => $this->customerModel->getCountByStatus('suspended'), 
            'current_page' => $this->request->getGet('page') ?? 1, 
            'search_keyword' => $keyword, 
            'filter_status' => $status, 
            'filter_type' => $type, 
            'username' => session()->get('username') 
        ]; 
 
        return view('home/index', $data); 
    } 
 
    public function create() 
    { 
        // Check if the user is logged in 
        if (session()->get('isLogged') !== true) { 
            return redirect()->to('/login') 
                ->with('error', 'Please log in first.'); 
        } 
 
        return view('home/create_account', [ 
            'username' => session()->get('username') 
        ]); 
    } 
 
    public function store() 
    { 
        // Check if the user is logged in 
        if (session()->get('isLogged') !== true) { 
            return redirect()->to('/login') 
                ->with('error', 'Please log in first.'); 
        } 
 
        $data = [ 
            'account_number' => $this->request->getPost('account_number'), 
            'customer_name' => $this->request->getPost('customer_name'), 
            'address' => $this->request->getPost('address'), 
            'phone' => $this->request->getPost('phone'), 
            'email' => $this->request->getPost('email'), 
            'meter_number' => $this->request->getPost('meter_number'), 
            'connection_type' => $this->request->getPost('connection_type'), 
            'status' => $this->request->getPost('status') 
        ]; 
 
        $this->customerModel->insert($data); 
 
        return redirect()->to('/customer-accounts') 
            ->with('success', 'Customer account added successfully.'); 
    } 

    public function edit($id)
    {
        // Check if the user is logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login')
                ->with('error', 'Please log in first.');
        }

        $account = $this->customerModel->find($id);

        if (!$account) {
            return redirect()->to('/customer-accounts')
                ->with('error', 'Account not found.');
        }

        return view('home/edit_account', [
            'account' => $account,
            'username' => session()->get('username')
        ]);
    }

    public function update($id)
    {
        // Check if the user is logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login')
                ->with('error', 'Please log in first.');
        }

        $data = [
            'account_number' => $this->request->getPost('account_number'),
            'customer_name' => $this->request->getPost('customer_name'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'meter_number' => $this->request->getPost('meter_number'),
            'connection_type' => $this->request->getPost('connection_type'),
            'status' => $this->request->getPost('status')
        ];

        $this->customerModel->update($id, $data);

        return redirect()->to('/customer-accounts')
            ->with('success', 'Customer account updated successfully.');
    }
 
    public function viewAccount($id) 
    { 
        // Check if the user is logged in 
        if (session()->get('isLogged') !== true) { 
            return redirect()->to('/login') 
                ->with('error', 'Please log in first.'); 
        } 
 
        $account = $this->customerModel->find($id); 
 
        if (!$account) { 
            return redirect()->to('/customer-accounts') 
                ->with('error', 'Account not found'); 
        } else { 
            $data = [ 
                'account' => $account, 
                'username' => session()->get('username') 
            ]; 
 
            return view('home/view_account', $data); 
        } 
    } 

    public function delete($id)
   {
    // Check if the user is logged in
    if (session()->get('isLogged') !== true) {
        return redirect()->to('/login')
            ->with('error', 'Please log in first.');
    }

    $account = $this->customerModel->find($id);

    if (!$account) {
        return redirect()->to('/customer-accounts')
            ->with('error', 'Account not found.');
    }

    $this->customerModel->delete($id);

    return redirect()->to('/customer-accounts')
        ->with('success', 'Customer account deleted successfully.');
    }

}




