#include<iostream>
using namespace std;

int primeTest(int n) {
    if(n<2) {
        return false;
    } else {
       int i = 2;
        while(i*i<=n) {
            if(n % i == 0) {
                return false;
            }
			i++;
        }
    }
    return true;
}

int main() {
    int x;
    cin >> x;
    if(primeTest(x)) {
        cout << x << " bilangan prima!" << endl;
    } else {
        cout << x << " bukan bilangan prima!" << endl;
    }
	return 0;
}