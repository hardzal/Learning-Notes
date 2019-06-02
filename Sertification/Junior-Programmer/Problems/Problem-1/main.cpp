#include <bits/stdc++.h>

using namespace std;

int main() {
    long long nilai, total=0;
    int i, j;
    // menset keseluruhan array dengan nilai awal nol
    int totalArr[10][1] ={{0}};
    vector<int> arrInt;

    ofstream fileku;
    fileku.open("angka.txt", ios::app);

    cout << "Angka yang diinputkan\t: "; cin >> nilai;

    // mengecek apakah ada kesalahan atau tidak
    if(cin.fail()) {
        cout << "bukan angka!" << endl;
    }

    for(i = 0; i < nilai; nilai/=10) {
        // memasukkan data nilai kedalam array arrInt
        arrInt.push_back(nilai % 10);
    }

    for(i = 0; i < 10; i++) {
        for(j = 0; j < arrInt.size(); j++) {
            // jika sama maka total angka tersebut bertambah
            if(i == arrInt[j]) {
                fileku << i << endl;
                totalArr[i][0]++;
            }
        }
        if(totalArr[i][0]) cout << i << " : " << totalArr[i][0] << endl;
    }
    fileku.close();
    return 0;
}
