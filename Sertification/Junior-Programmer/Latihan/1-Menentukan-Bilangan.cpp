#include<iostream>
#include<stdlib.h>
#include<vector>
using namespace std;

bool isPrime(long long int x) {
    long long int i = 2;
    if(x <= 2) return false;
    while(i*i<=x) {
        if(!(x % i)) {
            return false;
        }
        i++;
    }
    return true;
}

void primeGenerator(int x) {
    vector<int> arr;
    int j = 1;
    long long int i = 2;
    while(j <= x) {
        if(isPrime(i)) {
            arr.push_back(i);
            j++;
        }
        i++;
    }
    for(i = 0; i < arr.size(); i++) {
        cout << arr[i];
        if(i <= arr.size()-2) {
            cout << ", ";
        }
    }

}

void evenGenerator(int x) {
    int i = 1, j = 1;
    while(j <= x) {
        if(!(i % 2)) {
            cout << i;
            if(j <= x-1) cout << ", ";
            j++;
        }
        i++;
    };
}

int faktorialGenerator(int x) {
   if(x == 1) {
        cout << x;
        return 1;
   } else {
        cout << x << "*";
        return(x*faktorialGenerator(x-1));
   }
}

int main() {
    int n, i, j, pilih;
    int *arr;
    do{
        cout << "Menentukan Bilangan\n";
        cout << "\n1. Bilangan Genap\n2. Bilangan Faktorial\n3. Bilangan Prima\n";
        cout << "Pilih\t: "; cin >> pilih;
        switch(pilih) {
            case 1:
                cout << "Input Batasan bilangan genap\t: ";
                cin >> n;
                cout << "Hasil = ";
                evenGenerator(n);
                cout << endl << endl;
                break;
            case 2:
                cout << "\nBilangan Faktorial\n";
                cout << "Input Batasan bilangan Prima\t: ";
                cin >> n;
                cout << "Hasil = " << n << "! = ";
                cout << " = " << faktorialGenerator(n);
                cout << endl << endl;
                break;
            case 3:
                cout << "\nBilangan Prima\n";
                cout << "Input Batasan bilangan Prima\t: ";
                cin >> n;
                cout << "Hasil = ";
                primeGenerator(n);
                cout << endl << endl;
                break;
            default:
                exit(EXIT_SUCCESS);
                break;
        }
    } while(true);

    return 0;
}
