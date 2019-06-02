#include<iostream>
#include<string.h>
#include<vector>

using namespace std;

vector<int> sievOfEratosthenes(int N) {
    int i, j;
    bool *el;
    el = new bool[N+1];
    memset(el, 0, N);
    vector<int> primeList;
    for(i = 2; i <= N; i++){
        if(!el[i]) {
            primeList.push_back(i);
            j = i * i;
            while(j <= N) {
                el[j] = true;
                j = j+i;
            }
        }
    }
    return primeList;
}

int main() {
    int N;
    cin >> N;
    vector<int>arr(sievOfEratosthenes(N));
    for(int i = 0; i < arr.size(); i++) {
        cout << arr[i] << endl;
    }
    return 0;
}