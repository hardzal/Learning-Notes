#include<iostream>
#include<algorithm>
using namespace std;

void insertSort(int arr[], int N) {
    int i, j;
    for(i = 1; i < N; i++) {
        j = i;
        while((j > 0) && (arr[j] < arr[j-1])) {
            swap(arr[j], arr[j-1]);
            j = j - 1;
        }
    }
}

int main() {
    int arr[] = {1, 3, 0, 9, 4};
    insertSort(arr, 5);

    for(int i : arr) {
        cout << i << endl;
    }
    return 0;
}